   function cardExcerpt() {
    $(".card__excerpt").text(function(index, currentText) {
      return currentText.substr(0, 125) + '\u2026';
    });
  }
  cardExcerpt();
  function featuredTitle() {
   $(".featured__title").text(function(index, currentText) {
     return currentText.substr(0, 72) + '\u2026';
   });
 }
 featuredTitle();
