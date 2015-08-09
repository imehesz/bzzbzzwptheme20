var BizzBuzzUtil = {
// debounce straight from _underscore!
  debounce: function(func, wait, immediate) {
    var timeout, args, context, timestamp, result;

    var later = function() {
      var last = (+(new Date())) - timestamp;
      if (last < wait) {
        timeout = setTimeout(later, wait - last);
     } else {
       timeout = null;
       if (!immediate) {
         result = func.apply(context, args);
         context = args = null;
       }
     }
   };

    return function() {
    context = this;
    args = arguments;
    timestamp = +(new Date());
    var callNow = immediate && !timeout;
    if (!timeout) {
      timeout = setTimeout(later, wait);
    }
    if (callNow) {
      result = func.apply(context, args);
      context = args = null;
    }

    return result;
   };
  }
}
