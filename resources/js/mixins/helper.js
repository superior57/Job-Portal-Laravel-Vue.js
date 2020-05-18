import Vue from 'vue'

Vue.mixin({
  methods: {
    escapeHtml: function(text) {
      var map = {
          '&': '&amp;',
          '<': '&lt;',
          '>': '&gt;',
          '"': '&quot;',
          "'": '&#039;'
      };
      return text.replace(/[&<>"']/g, function(m) { return map[m]; });
    },
    strip_tags: function(str, allow){ 
      allow = (((allow || '') + '').toLowerCase().match(/<[a-z][a-z0-9]*>/g) || []).join(''); 
      var tags = /<\/?([a-z][a-z0-9]*)\b[^>]*>/gi; 
      var commentsAndPhpTags = /<!--[\s\S]*?-->|<\?(?:php)?[\s\S]*?\?>/gi; 
      return str.replace(commentsAndPhpTags, '').replace(tags, function ($0, $1) { 
      return allow.indexOf('<' + $1.toLowerCase() + '>') > -1 ? $0 :''; 
      }); 
    },
    getArrayIndex (array, attr, value) {
        for (var i = 0; i < array.length; i += 1) {
            if (array[i][attr] == value) {
            return i
            }
        }
        return -1
    },
  }
})