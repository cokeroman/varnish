#!/opt/python/bin/python

import SocketServer
import time
import threading
import subprocess 

class MiTcpHandler(SocketServer.BaseRequestHandler):
	
	# Sobreescribimos el metodo handle
	def handle(self):
		self.data = self.request.recv(1024).strip()
		if self.data == 'top_urls' or self.data ==  'top_urls_back' or self.data == 'top_status':
			datos = execute(self.data)
			for line in datos:
				self.request.send(line)
		else:
			self.request.send("Command not found!!")		
		time.sleep(0.1)


class ThreadServer(SocketServer.ThreadingMixIn, SocketServer.ForkingTCPServer):
	pass

def execute(check):

	command = "Command not found!"	
	if check == 'top_urls':
		varnishtop = subprocess.Popen(['/usr/bin/varnishtop', '-1' , '-i RxURL'], 
                        stdout=subprocess.PIPE,
                        )
		head = subprocess.Popen(['head', '-10'], 
                        stdin=varnishtop.stdout,
                        stdout=subprocess.PIPE,
                        )

		command = head.stdout
        if check == 'top_urls_back':
		varnishtop = subprocess.Popen(['/usr/bin/varnishtop', '-1' , '-b', '-i TxURL'],
                        stdout=subprocess.PIPE,
                        )
                head = subprocess.Popen(['head', '-10'],
                        stdin=varnishtop.stdout,
                        stdout=subprocess.PIPE,
                        )

                command = head.stdout
        if check == 'top_status':
                varnishtop = subprocess.Popen(['/usr/bin/varnishtop', '-1' , '-i TxStatus'],
                        stdout=subprocess.PIPE,
                        )
                head = subprocess.Popen(['head', '-10'],
                        stdin=varnishtop.stdout,
                        stdout=subprocess.PIPE,
                        )

                command = head.stdout
	
	return command



def main():
	host = "0.0.0.0"
	port = 9999
	
	server = ThreadServer((host, port) ,MiTcpHandler)
	server_thread = threading.Thread(target=server.serve_forever,)
	server_thread.start()

main()
	
	
