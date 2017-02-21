#!/bin/bash
VM_NAME=$1
if [ -z "$VM_NAME" ]
then
	echo "Укажите имя контейнера: ./bash.sh VM_NAME"
else
	docker exec -ti $VM_NAME bash
fi
