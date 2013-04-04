#!/usr/bin/env python

import csv

def parse():
  print "DELETE FROM guest;"
  with open('database.csv', 'rb') as csvfile:
    codereader = csv.reader(csvfile, delimiter=',', quotechar='"')
    for row in codereader:
      print """INSERT INTO guest VALUES ("%s", '%s', '%s', '%s', '%s', '%s', '%s', '%s');""" % \
        (row[1], row[8].upper(), '0', row[5], row[6], '', 0, '1')


if __name__ == '__main__':
  parse()
