document.addEventListener('DOMContentLoaded', function() {
   let formatPosts = function (posts) {
      $('#blog-list').html('');
      $.each(posts, function(index, post) {
         let link = base_url + post.slug +'/' + post.id,
             posted_at = new Date(post.date + '+07:00'),
             the_post = '<h3><a href="' + link + '">' + post.title.rendered + '</a></h3>' +
                 '<div class="small"><i class="fa-regular fa-calendar-days"></i> ' + posted_at.toLocaleDateString() + '</div>' +
                 '<div>' + post.excerpt.rendered + ' <a href="' + link + '">' + read_more + ' <i class="fa-solid fa-chevron-right"></i></a></div><hr>';
         $('#blog-list').append(the_post);
      })
   }
   let formatView = function (post) {

   }
   if ('list' === mode) {
      // JUST LIST THE POSTS
      $.ajax({
         url: blog_url + 'posts?page=1&per_page=10&context=embed&categories=' + category_id
      }).done(function(response) {
         formatPosts(response);
      });
   } else if ('view' === mode) {
      // ONLY 1 POST
      $.ajax({
         url: blog_url + 'posts/' + blog_id
      }).done(function(response) {
         formatView(response);
      });
   }
});