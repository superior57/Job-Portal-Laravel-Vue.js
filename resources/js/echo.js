import Event from './event';
Echo.join('chat')
    .here(users => {
        console.log(users);
    })
    .joining(user => {
        console.log(user);
    })
    .leaving(user => {
        console.log(user);
    })