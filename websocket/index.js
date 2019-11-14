'use strict';

// Imports
const WebSocketServer = require('ws').Server;

// Constants
const WS_CONF = {
	IP_BIND: '0.0.0.0',
	PORT: 62026
}

// Websocket server
var wsServer = new WebSocketServer({
	host: WS_CONF.IP_BIND,
	port: WS_CONF.PORT
});

// Connected clients to Websocket
let connectedClients = [];


// WebSocket server events
wsServer.on('connection', (ws, req) => {
	console.log('Open: ' + ((req.headers['x-real-ip'] != undefined) ? req.headers['x-real-ip'] : req.connection.remoteAddress) + " - URL: " + req.url + ' - Date: ' + new Date());

	// Check session/token
	let session = req.url.split("/").pop();
	if (session != "") {
		// This is very basic, better check session with php-session-unserializer
		connectedClients[session] = {
			ws: ws,
			data: []
		};
	} else {
		console.log("No session provided, dropping connection.");
		ws.close();
	}

	ws.on('message', (inputdata) => {
		console.log('Message: ' + ((req.headers['x-real-ip'] != undefined) ? req.headers['x-real-ip'] : req.connection.remoteAddress) + " - URL: " + req.url + ' - Date: ' + new Date());

		try {
			inputdata = JSON.parse(inputdata);
			console.log(inputdata);

			switch (inputdata.op) {
				case 'HELLO_WORLD':

					// Reply to sender
					connectedClients[session].ws.send(JSON.stringify({
						status: 'ok',
						op: inputdata.op,
						data: {}
					}));

					break;

				case 'CHAT_MESSAGE':

					// Send message to everybody
					for (let client in connectedClients) {
						connectedClients[client].ws.send(JSON.stringify({
							status: 'ok',
							op: inputdata.op,
							data: {
								msg: inputdata.msg,
								name: inputdata.name,
								timestamp: parseInt(new Date().getTime() / 1000),
							}
						}));
					}

					break;

				default:
					connectedClients[session].ws.send(JSON.stringify({
						status: 'no',
						msg: "Operation not found: " + inputdata.op
					}));
					console.log("Operation not found: " + inputdata.op);
			}
		} catch (e) {
			console.warn("Message event error " + e);
		}
	});

	ws.on('close', (code, message) => {
		console.log('Close: ' + ((req.headers['x-real-ip'] != undefined) ? req.headers['x-real-ip'] : req.connection.remoteAddress) + " - URL: " + req.url + ' - Date: ' + new Date());

		// Remove from connected clients object
		for (let client in connectedClients) {
			if (connectedClients[client].readyState !== ws.OPEN) {
				delete connectedClients[client];
			}
		}

	});
});

console.log(`WS server is listening at ws://${WS_CONF.IP_BIND}:${WS_CONF.PORT}`);