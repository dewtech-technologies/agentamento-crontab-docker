#!/bin/sh
set -e

# Verifica se foram passados argumentos
if [ $# -eq 0 ]
then
    # Verifica se o arquivo crontab existe no diretório /etc/cron.d/
    if [ -f "/etc/cron.d/file" ];then
       # Exibe o conteúdo das tarefas cron
       cat /etc/cron.d/file
       # Instala as tarefas cron
       crontab /etc/cron.d/file
    else
       echo "No crontab file found in /etc/cron.d/" 
       exit 1
    fi
else
    # Se argumentos foram fornecidos, adicione-os ao arquivo de tarefas temporário
    for i in "$@"
    do
       echo "$i" >> /tmp/jobs.txt
    done
    echo "Running crontab service ..."
    # Instala as tarefas cron do arquivo temporário
    crontab /tmp/jobs.txt
fi

rm -f /var/run/crond.pid

# Iniciar o cron em segundo plano
cron &

# Mantenha o contêiner rodando com um comando em primeiro plano
exec tail -f /var/log/cron.log
