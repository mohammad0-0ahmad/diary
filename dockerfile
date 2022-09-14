FROM tomsik68/xampp

#Install node and composer & define php, mysql and composer as global command.
RUN apt update
RUN apt upgrade
RUN apt install sudo
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | sudo -E bash -
RUN sudo apt install -y nodejs
RUN sudo apt install -y git
RUN ln -sf /opt/lampp/bin/* /usr/bin
Run curl -s https://getcomposer.org/installer | php
Run mv composer.phar /usr/bin/composer

WORKDIR workspace
COPY package.json .
Run npm i
COPY . .
Run composer i