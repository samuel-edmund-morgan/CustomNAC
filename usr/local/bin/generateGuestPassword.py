import sys
from Exscript.protocols import SSH2
from Exscript.util.file import get_hosts_from_file
from Exscript.util.file import get_accounts_from_file

user_password = sys.argv[1]
user_group = "InternetUsers"

admin_account = get_accounts_from_file('/etc/fortipasswd')[0]
fortigate_host = get_hosts_from_file('/etc/fortihost')[0].get_address()

conn = SSH2()
conn.connect(fortigate_host)
conn.login(admin_account)
conn.execute('config user local')
conn.execute('edit Guest')
conn.execute('set type password')
conn.execute('set passwd {p}'.format(p=user_password))
conn.execute('end')
conn.execute('config user group')
conn.execute('edit {g}'.format(g=user_group))
conn.execute('append member Guest')
conn.execute('end')
conn.send('exit \r')
conn.close()
