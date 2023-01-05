var words = ['How is health today, Sounds like not good? Find your doctor online. Book as you wish with MyHakim.com', 'ዛሬ ጤናዎ እንዴት ነው? ጥሩ ያልሆነ ይመስላል? MyHakim.com በአሻዎት ሰዐት በአሻዎት ሆስፒታል ከዶክተርዎ ጋር ቀጠሮዎን አሁን ያዝይዞታል።'],
    part,
    i = 0,
    offset = 0,
    len = words.length,
    forwards = true,
    skip_count = 0,
    skip_delay = 15,
    speed = 70;
var wordflick = function () {
  setInterval(function () {
    if (forwards) {
      if (offset >= words[i].length) {
        ++skip_count;
        if (skip_count == skip_delay) {
          forwards = false;
          skip_count = 0;
        }
      }
    }
    else {
      if (offset == 0) {
        forwards = true;
        i++;
        offset = 0;
        if (i >= len) {
          i = 0;
        }
      }
    }
    part = words[i].substr(0, offset);
    if (skip_count == 0) {
      if (forwards) {
        offset++;
      }
      else {
        offset--;
      }
    }
    $('.word').text(part);
  },speed);
};

$(document).ready(function () {
  wordflick();
});