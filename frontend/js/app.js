document.getElementById('year').textContent = new Date().getFullYear();

(function () {
  const routes = {
    home:         'home.html',
    cars:         'cars.html',
    reservations: 'reservations.html',
    profile:      'profile.html',
    login:        'login.html',
    register:     'register.html',
    admin:        'admin.html',
    'not-found':  'not-found.html'
  };

  if (typeof $.spapp === 'function') {
    var app = $.spapp({
      defaultView  : 'home',
      templateDir  : 'views/',
      pageNotFound : 'not-found'
    });

    Object.entries(routes).forEach(([view, file]) => {
      app.route({ view, load: file });
    });

    app.run();
    console.log('SPApp mode');
    return;
  }

  console.warn('SPApp not detected — using fallback loader.');

  const $pages = $('.spapp-page');
  function show(view) {
    view = view || 'home';
    const file = routes[view] || routes['not-found'];

    $('#'+view).load('views/' + file, function () {

      $pages.hide().removeClass('spapp-current');
      $('#'+view).show().addClass('spapp-current');
    });
  }

  function onHashChange() {
    const view = (location.hash || '#home').replace('#', '');
    if (!routes[view]) {
      location.hash = '#not-found';
      return;
    }
    show(view);
  }

  $(window).on('hashchange', onHashChange);
  onHashChange();
})();
