#!/bin/bash

websocketsroot="/mnt/xvdf1/nodews"

function websockets_start() {
	for i in $(ls ${websocketsroot}); do
		if [ -d ${websocketsroot}/${i} ]; then
			for j in $(ls ${websocketsroot}/${i}); do
				if [ "${j}" == "start.sh" ]; then
					echo ${i}
					screen -dmS ${i}
					sleep 0.5
					screen -S ${i} -X stuff "cd ${websocketsroot}/${i}; ./start.sh\r"
				fi
			done
		fi
	done
}

function websockets_stop() {
	screen -ls | grep Detached | awk '{print $1}' | while read in; do
		echo ${in}
		screen -X -S ${in} quit
	done
}

case $1 in
start)
	websockets_start
	;;
stop)
	websockets_stop
	;;
restart)
	websockets_stop
	sleep 1
	websockets_start
	;;
*)
	echo "Uso:"
	echo "systemctl {start|stop|restart} ${0}"
	echo "---"
	echo "start: Iniciar NodeJS websockets"
	echo "stop: Apagar NodeJS websockets"
	echo "restart: Reiniciar NodeJS websockets"
	echo "---"
	;;
esac

exit 0

# Fin
