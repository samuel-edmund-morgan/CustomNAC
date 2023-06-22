import sys
from Exscript.protocols import SSH2
from Exscript.util.file import get_hosts_from_file
from Exscript.util.file import get_accounts_from_file


admin_account = get_accounts_from_file('/etc/fortipasswd')[0]
fortigate_host = get_hosts_from_file('/etc/fortihost')[0].get_address()
file_with_wesites = open('/etc/websites', 'r')
websites_count = len(file_with_wesites.readlines())


def takeFirstWebsite(file):
        with open(file, 'r+') as f:
                firstLine = f.readline()
                restLines = f.read()
                f.seek(0)
                f.write(restLines)
                f.truncate()
                return firstLine.strip()



conn = SSH2()
conn.connect(fortigate_host)
conn.login(admin_account)
conn.set_timeout(5)

for i in range(0, websites_count):

        domain = takeFirstWebsite('/etc/websites')
        truncated_domain = domain[0:18]

        wildcard_domain = '.'+domain
        truncated_wildcard_domain = wildcard_domain[0:18]

        conn.execute('config firewall address')
        conn.execute('edit {td}'.format(td=truncated_domain))
        conn.execute('set type fqdn')
        conn.execute('set fqdn {d}'.format(d=domain))
        conn.execute('end')
        conn.execute('config firewall addrgrp')
        conn.execute('edit AllowedDomains')
        conn.execute('append member {td}'.format(td=truncated_domain))
        conn.execute('end')


        conn.execute('config firewall address')
        conn.execute('edit {twd}'.format(twd=truncated_wildcard_domain))
        conn.execute('set type fqdn')
        conn.execute('set fqdn *{w}'.format(w=wildcard_domain))
        conn.execute('end')
        conn.execute('config firewall addrgrp')
        conn.execute('edit AllowedWildcards')
        conn.execute('append member {twd}'.format(twd=truncated_wildcard_domain))
        conn.execute('end')


conn.send('exit \r')
conn.close()
