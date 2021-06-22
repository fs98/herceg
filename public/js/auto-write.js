$(document).ready(function() {
  var dir = 1;
  var sentences = ["Sos od paradajza...", "Sok od malina...", "Tinktura od divljeg bijelog luka...", "Melem protiv gljivica..."];
  var sentIndex = 0;
  var checker = false; 
    if(document.getElementById("aa-search-input") !== null) {
      function nextStep() {
        if(checker) {
          setTimeout(function() {
            var input = document.getElementById("aa-search-input");
            var val = input.getAttribute("placeholder") || "";
            val = sentences[sentIndex].substring(0, val.length + dir);

            if(val.length === sentences[sentIndex].length) dir = -1;
            if(val.length === 0) {
              dir = 1;
              sentIndex = (sentIndex + 1) % sentences.length;
              checker = true;
            }
            input.setAttribute("placeholder", val);
            checker = false;
          }, 700);
        } else {
          var input = document.getElementById("aa-search-input");
          var val = input.getAttribute("placeholder") || "";
          val = sentences[sentIndex].substring(0, val.length + dir);

          if(val.length === sentences[sentIndex].length) dir = -1;
          if(val.length === 0) {
            dir = 1;
            sentIndex = (sentIndex + 1) % sentences.length;
            checker = true;
          }
          input.setAttribute("placeholder", val);
        }
      }
      window.setInterval(nextStep, 125);
    }
});