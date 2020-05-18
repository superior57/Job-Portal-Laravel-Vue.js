const express = require('express');
const app = express();
var fs = require('fs');
var path = require('path');

var options = {
  key: fs.readFileSync(path.resolve('chat-cert/chat_key.key')),
  cert: fs.readFileSync(path.resolve('chat-cert/chat_crt.crt'))
};
var clients = {};
var connected_users = [];
var https = require('https').createServer(options, app);
var io = require('socket.io')(https);

io.on('connection', function(socket) {
  
  socket.on('add-user', function(data) {
      clients[data.userId] = {
        "socket": socket.id,
      };
      connected_users.push(data.userId);
      io.sockets.emit('connected-users', { users_connected: connected_users });
  });
  
  socket.on('chat-message', function(data){
      if (clients[data.user_id]) {
        io.sockets.connected[clients[data.user_id].socket].emit("chat-message", data);
      } else {
        console.log("User does not exist: " + data.user); 
      }
  });

  socket.on('typing', (data) => {
    if (clients[data.user_id]) {
      io.sockets.connected[clients[data.user_id].socket].emit('typing', data)
    }
    
  })

  socket.on('stoptyping', () => {
    if (clients[data.user_id]) {
      io.sockets.connected[clients[data.user_id].socket].emit('stoptyping')
    }
  })

  //Removing the socket on disconnect
  socket.on('disconnect', function() {
    for(var name in clients) {
      if(clients[name].socket === socket.id) {
        delete clients[name];
        break;
      }
    }	
  })
});

https.listen(3001, function(){
  console.log('listening on *:81');
});