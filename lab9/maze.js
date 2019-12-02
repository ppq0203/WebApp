
/* CSE3026 : Web Application Development
 * Lab 09 - Maze
 */
/*
var loser = null;  // whether the user has hit a wall

window.onload = function() {
  document.getElementById("boundary1").onmouseover = overBoundary;
};

// called when mouse enters the walls;
// signals the end of the game with a loss
function overBoundary(event) {
  console.log("overBoundary")
  console.log(event);
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {

}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {

}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {

}
*/

/* CSE326 : Web Application Development
 * Lab 9 - Maze
 *
 */


var loser = null;  // whether the user has hit a wall
var finish = false;

window.onload = function() {
   $("start").onclick = startClick;
   $("end").onmouseover = overEnd;
   var boundaries = $$("div#maze div.boundary");
   for (var i = 0; i < boundaries.length; i++) {
      boundaries[i].onmouseover = overBoundary;
   }
};

// called when mouse enters the walls;
// signals the end of the game with a loss
function overBoundary(event) {
   if ((loser === false) && (finish === false)) {
      loser = true;
      $("status").textContent = "You lose!";
      var boundaries = $$("div#maze div.boundary");
      for (var i = 0; i < boundaries.length; i++) {
         boundaries[i].addClassName("youlose");
      }
      event.stop();
   }
}

// called when mouse is clicked on Start div;
// sets the maze back to its initial playable state
function startClick() {
   loser = false;
   finish = false;
   $("status").textContent = "Click the \"S\" to begin.";
   var boundaries = $$("div#maze div.boundary");
   for (var i = 0; i < boundaries.length; i++) {
      boundaries[i].removeClassName("youlose");
   }
   document.body.observe("mousemove", overBody);
}

// called when mouse is on top of the End div.
// signals the end of the game with a win
function overEnd() {
   finish = true;
    if (loser) {
        $("status").textContent = "You lose!";
    }
    else {
        $("status").textContent = "You win!";
    }
}

// test for mouse being over document.body so that the player
// can't cheat by going outside the maze
function overBody(event) {
   if (loser === false && event.element() == document.body) {
      overBoundary(event);
   }
}
