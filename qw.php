<?php
/**
 * Created by JetBrains PhpStorm.
 * User: wesleyelder
 * Date: 02/06/2013
 * Time: 20:48
 * To change this template use File | Settings | File Templates.
 */



- name: 'XBMC'
  git: 'git://github.com/DJXFMA/SiriProxy-XBMC.git'
  xbmc_host: '192.168.0.7'    #Internal IP address of your computer running XBMC.
  xbmc_port: 8080               #Port that the XBMC interface listens to.
  xbmc_username: 'xbmc'         #Username as specified in XBMC
  xbmc_password: 'xbmc'         #password as specified in XBMC

    - name: 'Example'
      path: './plugins/siriproxy-example'
