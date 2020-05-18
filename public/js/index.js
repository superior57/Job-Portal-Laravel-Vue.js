const express = require('express');
const app = express();
const server = app.listen(3001, function() {
    console.log('server running on port 3001');
});

var clients = {};
var connected_users = [];

const io = require('socket.io')(server);

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