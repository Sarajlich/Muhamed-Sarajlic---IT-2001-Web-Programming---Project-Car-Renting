var app = $.spapp({
    defaultView: "#home",
    templateDir: "./views/"

});

//privremeno, kasnije kada se bude baza dodavala cu ovo ukloniti (trenutno samo za izgled)
const CARS = [
    { id:1, brand:'Toyota', model:'Corolla', year:2021, price:35, status:'available',   category:'Sedan' },
    { id:2, brand:'Volkswagen', model:'Golf',  year:2020, price:40, status:'available',   category:'Hatchback' },
    { id:3, brand:'BMW',       model:'X3',     year:2019, price:75, status:'unavailable', category:'SUV' },
    { id:4, brand:'Tesla',     model:'Model 3',year:2022, price:95, status:'available',   category:'Electric' },
    { id:5, brand:'BMW',     model:'M5 Comp',year:2026, price:120, status:'available',   category:'Sedan' },
    { id:6, brand:'Mercedes',     model:'GLE',year:2024, price:100, status:'unavailable',   category:'SUV' }
];

//home - za pretragu auta
$(document).on('submit', '#quick-search', function (e) {
    e.preventDefault();
    const term = ($('#q').val() || '').toLowerCase().trim();
    sessionStorage.setItem('searchTerm', term);
    window.location.hash = '#cars';
});

//cars - pretraga
function renderCars() {
    const $grid = $('#cars-grid');
    if ($grid.length === 0) return;
  
    const term = (sessionStorage.getItem('searchTerm') || '').toLowerCase().trim();
  
    const list = term
      ? CARS.filter(c => Object.values(c).join(' ').toLowerCase().includes(term))
      : CARS;
  
    const html = list.map(c => `
      <article class="card">
        <h3 style="margin:.3rem 0;">${c.brand} ${c.model} <span class="badge">${c.year}</span></h3>
        <div>Category: ${c.category}</div>
        <div><strong>$${c.price}</strong> / day</div>
        <div style="margin-top: 10px;">
          <span class="badge" style="background:${c.status==='available' ? '#d1fae5' : '#e5e7eb'}">${c.status}</span>
        </div>
        <button class="btn-primary" style="margin-top: 15px;" ${c.status!=='available' ? 'disabled' : ''}>Reserve</button>
      </article>
    `).join('');
  
    $grid.html(html);
}

//reservations
function renderReservations() {
    const $tbody = $('#reservations-body');
    if ($tbody.length === 0) return;
  
    const rows = [
      { id:101, car:'Toyota Corolla', start:'2025-10-12', end:'2025-10-15', total:105, status:'pending' }
    ];
  
    $tbody.html(rows.map(r => `
      <tr>
        <td>#${r.id}</td><td>${r.car}</td><td>${r.start}</td><td>${r.end}</td><td>$${r.total}</td>
        <td><span class="badge">${r.status}</span></td>
      </tr>
    `).join(''));
}

app.route({
    view: 'cars',
    onReady: function () { renderCars(); }
  });
  
app.route({
    view: 'reservations',
    onReady: function () { renderReservations(); }
  });

app.run();