```js
/*
  NOTE: new mouse tracking logic
    - right now it calculates difference between saved mouse position on bar click and then mousemove mouse position
    - alternative options:
      - calculate it using difference (delta?) of only(!) mousemove (on window?) mouse position
      -

  NOTE: or maybe instead new tracking logic, lets implement new scroll position tracking logic
    - right now it uses vuebar dragger top offset/position to calculate scroll position (it has problems with scrollbar min height) /

    - alternative options:
      - calculate it using vuebar dragger bottom offset/position
      - calculate it using vuebar dragger center offset/position (would probably nicely also with max-height)

  NOTE: current scroll ---> bar position logic plays somewhat nicely with -webkit-overflow-scrolling: touch;
*/  
```
