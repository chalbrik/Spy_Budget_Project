//rozwijaj pełną nazwę linków w navbarze
// document.querySelectorAll(".nav-item").forEach((navItem) => {
//     navItem.addEventListener("mouseover", () => {
//       navItem.querySelector("img.nav-icon").nextElementSibling.hidden = false;
//       navItem.querySelector("img.nav-icon").classList.add("animate-move-left");
//       navItem.querySelector("img.nav-icon").nextElementSibling.classList.add("animate-move-right");
  
//     });
//   });
  
  // document.querySelectorAll(".nav-item").forEach((navItem) => {
  //   navItem.addEventListener("mouseout", () => {
  //     navItem.querySelector("img.nav-icon").nextElementSibling.hidden = true;
  //     navItem.querySelector("img.nav-icon").classList.remove("animate-move-left");
  //     navItem.querySelector("img.nav-icon").nextElementSibling.classList.remove("animate-move-right");
  //   });
  // });

  // document.querySelector(".nav-item-add").addEventListener("mouseover", ()=> {
  //   document.querySelector(".dropdown-menu-add").hidden = false;
  // });

  // document.querySelector(".nav-name-add").addEventListener("mouseout", ()=> {
  //   document.querySelector(".nav-name-add").nextElementSibling.hidden = true;
  // });

  //skrypt kursora
  document.addEventListener('mousemove', function(e) {
    var cursor = document.getElementById('customCursor');
    cursor.style.left = e.pageX + 'px';
    cursor.style.top = e.pageY + 'px';
});

document.querySelectorAll('input, a, textarea, label').forEach((inputItem) => {
  inputItem.addEventListener("mouseover", () => {
      document.querySelector("#customCursor").classList.remove("custom-cursor");
  });

  inputItem.addEventListener("mouseout", () => {
      document.querySelector("#customCursor").classList.add("custom-cursor");
  });
});

document.querySelectorAll('button').forEach((inputItem) => {
  inputItem.addEventListener("mouseover", ()=>{
    document.querySelector("#customCursor").classList.remove("custom-cursor");
});
});

document.querySelectorAll('button').forEach((inputItem) => {
inputItem.addEventListener("mouseout", ()=>{
  document.querySelector("#customCursor").classList.add("custom-cursor");
});
});

  document.addEventListener("click", ()=>{
    document.querySelector("#customCursor").classList.add("hide-cursor");

    setTimeout(() => {
      customCursor.classList.remove('hide-cursor');
  }, 500); // 1000 milisekund = 1 sekunda
  });

//koniec skryptu działania kursora

  
  function submitForm() {
    document.getElementById('time-frame-form').submit();
  }

  document.addEventListener('DOMContentLoaded', function () {
    var selectElement = document.getElementById('time-period');
    selectElement.addEventListener('change', submitForm);
});

//animacje ikonek na stronie głównej

document.querySelectorAll(".home-page-description").forEach((item) => {
  item.addEventListener("mouseover", ()=>{
    if(item.children.length > 1){
      item.children[0].classList.add("main-page-icon-hovered");
      item.children[1].classList.add("home-page-description-decoration-hovered");
    }
    
    });
});

document.querySelectorAll(".home-page-description").forEach((item) => {
  item.addEventListener("mouseout", ()=>{
    if(item.children.length > 1){
      item.children[0].classList.remove("main-page-icon-hovered");
      item.children[1].classList.remove("home-page-description-decoration-hovered");
    }
    });
});

//koniec animacji ikonek

//usuwanie czerwonego stylu po kliknięciu na input

document.querySelectorAll(".single-form-input").forEach((item) => {
  item.addEventListener("mouseout", ()=>{
    if(item.children.length > 1){
      item.children[0].classList.remove("main-page-icon-hovered");
      item.children[1].classList.remove("home-page-description-decoration-hovered");
    }
    });
});


document.querySelectorAll(".single-form-input").forEach((item) => {
  item.addEventListener("focus", ()=> {
    item.classList.remove("application-form-value-empty");
  });
});

//musiałem tutaj dodać warunek, żeby sprawdzał czy element znajduje sie na stronie aby móc go nasłuchiwać, inaczej skrypt mi sie zatrzymywał i powodował błędy
if(document.querySelector(".amount-input")){
  document.querySelector(".amount-input").addEventListener("focus", ()=> {
    document.querySelector(".amount-input").classList.remove("amount-input-error");
    document.querySelector(".currency").classList.remove("currency-error");
  });

  document.querySelector(".date-input").addEventListener("focus", ()=> {
    document.querySelector(".date-input").classList.remove("date-input-error");
  });
  
  document.querySelector(".category").addEventListener("click", ()=> {
    document.querySelector(".category").classList.remove("category-error");
  });
  
}

// ten kod tutaj znajduje wszystkie inputy tekstowe, które zaświecą sie na czerwono i je usunie po kliknięciu na niego
if(document.querySelector(".settings-data-input")){
  document.querySelectorAll(".settings-data-input").forEach((element) => {
    element.addEventListener("focus", ()=>{
      if(element.classList.contains("settings-data-input-error")){
        element.classList.remove("settings-data-input-error");
      }
      
    });
  });
  
}

//koniec usuwania czerwonego styli po kliknięciu na input

//poniżej kod, który odpowiada za wyświetlanie przycisków do usunięcia jeżeli najedzie się na kategorię w ustawieniach
if(document.querySelector(".settings-single-category-catch-mouse")){
  document.querySelectorAll(".settings-single-category-catch-mouse").forEach((element) => {
      element.addEventListener("mouseover", ()=>{
        element.firstElementChild.nextElementSibling.hidden = false;
      });

      element.addEventListener("mouseout", ()=>{
        element.firstElementChild.nextElementSibling.hidden = true;
      });
    });
  }
//koniec - kod, który odpowiada za wyświetlanie przycisków do usunięcia jeżeli najedzie się na kategorię w ustawieniach

// poniżej kod - potwierdzenie usunięcia użytkownika

  function confirmDelete(){
    if(confirm("Do you want to delete your account?")){
      document.getElementById('delete-user-form').submit();
    }
  }

// koniec - potwierdzenie usunięcia użytkownika


//rozwijanie bloku tekstu z informacjami o stronie dla użytkownika

document.querySelector(".check-balance-description-button").addEventListener("click", ()=>{
  document.querySelector(".check-balance-description").classList.toggle("enable");
});

document.querySelector(".check-balance-description-button").addEventListener("click", ()=>{
  document.querySelector(".check-balance-description-button").classList.toggle("clicked");
});

//koniec kodu z blokiem tekstu z informajami o stronie dla użytkownika


  
  //doughnut - incomes
  const incomesCtx = document.getElementById("incomeDoughnutChart");
  
  new Chart(incomesCtx, {
    type: "doughnut",
    data: {
      labels: incomesLabels,
      datasets: [
        {
          label: "Incomes",
          data: incomesValues,
          backgroundColor: [
            "rgb(255, 99, 132)",
            "rgb(54, 162, 235)",
            "rgb(255, 205, 86)",
            "rgb(255, 88, 86)",
            "rgb(255, 115, 26)",
          ],
          hoverOffset: 4,
        },
      ],
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: false,
          position: "right",
        },
        title: {
          display: false,
          text: "Chart.js Doughnut Chart",
        },
      },
    },
  });
  
  //doughnut - expenses
  const expensesCtx = document.getElementById("expensesDoughnutChart");
  
  new Chart(expensesCtx, {
    type: "doughnut",
    data: {
      labels: expensesLabels,
      datasets: [
        {
          label: "Expenses",
          data: expensesValues,
          backgroundColor: [
            "rgb(255, 99, 132)",
            "rgb(54, 162, 235)",
            "rgb(255, 205, 86)",
            "rgb(255, 88, 86)",
            "rgb(255, 115, 26)",
            "rgb(75, 192, 192)",
            "rgb(153, 102, 255)",
            "rgb(255, 159, 64)",
            "rgb(201, 203, 207)",
            "rgb(54, 235, 183)",
          ],
          hoverOffset: 4,
        },
      ],
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: false,
          position: "right",
        },
        title: {
          display: false,
          text: "Chart.js Doughnut Chart",
        },
      },
    },
  });
  
  //line - savings
  // const savingsCtx = document.getElementById("savingsLineChart");
  
  // new Chart(savingsCtx, {
  //   type: "line",
  //   data: {
  //     labels: [
  //       "Mon",
  //       "Tue",
  //       "Wed",
  //       "Thu",
  //       "Fri",
  //       "Sat",
  //       "Sun",
  //       "Mon",
  //       "Tue",
  //       "Wed",
  //       "Thu",
  //       "Fri",
  //       "Sat",
  //       "Sun",
  //       "Mon",
  //       "Tue",
  //       "Wed",
  //       "Thu",
  //       "Fri",
  //       "Sat",
  //       "Sun",
  //       "Mon",
  //       "Tue",
  //       "Wed",
  //       "Thu",
  //       "Fri",
  //       "Sat",
  //       "Sun",
  //     ],
  //     datasets: [
  //       {
  //         label: "Money",
  //         data: [
  //           1259, 1242, 1226, 1211, 1197, 1184, 1171, 1160, 1149, 1139, 1133,
  //           1122, 1115, 1106, 1099, 1090, 1086, 1080, 1075, 1070, 1065, 1061,
  //           1057, 1053, 1049, 1046, 1043, 1040,
  //         ],
  //         fill: false,
  //         borderColor: "rgb(75, 192, 192)",
  //         tension: 0.1,
  //       },
  //       {
  //         label: "Expenses",
  //         data: [
  //           27, 207, 209, 271, 185, 274, 134, 274, 186, 70, 102, 242, 136, 22,
  //           210, 184, 202, 228, 273, 26, 266, 263, 225, 243, 93, 208, 148, 163,
  //         ],
  //         fill: false,
  //         borderColor: "rgb(255, 99, 132)",
  //         tension: 0.1,
  //       },
  //     ],
  //   },
  //   options: {
  //     responsive: true,
  //     maintainAspectRatio: false,
  //     scales: {
  //       y: {
  //         beginAtZero: true,
  //       },
  //     },
  //   },
  // });
  
  
  // Napisz tutaj funkcję, która dodaje klasę do inputa, który nie został wypełniony
  