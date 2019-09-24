#!/usr/bin/env python
"""
Probaly wrote this in 2012 as I was figuring my way around Python
and it's networking potential. So much I could improve on now, but I 
choose to let remain the same as a reminder of my path to today
"""

import socket
from socket import *
import os
import psutil

network = '192.168.1.'
def is_up(addr):
    s = socket(AF_INET, SOCK_STREAM)
    s.settimeout(0.05)
    if not s.connect_ex((addr,135))
        s.close() 
        return 1
    else:
        s.close()
 
def run():
    print  ' '
    for ip in xrange(1,256):
        addr = network + str(ip)
        if is_up(addr):
            print '%s \t- %s' %(addr, getfqdn(addr))
    print
 
if __name__ == '__main__':
    print '''Scanning. Please wait...'''
 
run()

print " Enter ip address to sniff: "
HOST = raw_input()

def sniffing(host, win, socket_prot):
    while 1:
        sniffer = socket(AF_INET, SOCK_RAW, socket_prot)
        sniffer.bind((host, 0))

        sniffer.setsockopt(socket.IPPROTO_IP, socket.IP_HDRINCL, 1)

        if win == 1:
            sniffer.ioctl(socket.SIO_RCVALL, socket_RCVALL_ON)

        print sniffer.recvfrom(65565)

def main(host):
    if os.name == 'nt':
        sniffing(host, 1, IPPROTO_IP)
    else:
        sniffing(host, 0, socket.IPPROTO_ICMP)

if __name__ == '__main__':
    main(HOST)


