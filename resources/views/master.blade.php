<html>
  <head>
    <style>
      body {
          font-family: "Work Sans", sans-serif;
          background: rgb(230, 230, 230);
      }
      .time { 
        margin:20px auto;
          background: rgb(64, 64, 64);
          color: #fff;
          border: 7px solid rgb(255, 252, 252);
          box-shadow: 0 2px 10px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
          padding: 8px;
          text-align: center;
          width: 500px;
      }
      .hms {
          font-size: 68pt;
          font-weight: 200;
      }
      .ampm {
          font-size: 22pt;
      }
      .date {
          font-size: 15pt;
      }
    </style>
  </head>
  <body>

  @yield('content')
  </body>
  <script>
  function updateTime() {
    var dateInfo = new Date();

    /* time */
    var hr,
      _min = (dateInfo.getMinutes() < 10) ? "0" + dateInfo.getMinutes() : dateInfo.getMinutes(),
      sec = (dateInfo.getSeconds() < 10) ? "0" + dateInfo.getSeconds() : dateInfo.getSeconds(),
      ampm = (dateInfo.getHours() >= 12) ? "PM" : "AM";

    // replace 0 with 12 at midnight, subtract 12 from hour if 13–23
    if (dateInfo.getHours() == 0) {
      hr = 12;
    } else if (dateInfo.getHours() > 12) {
      hr = dateInfo.getHours() - 12;
    } else {
      hr = dateInfo.getHours();
    }

    var currentTime = hr + ":" + _min + ":" + sec;

    // print time
    document.getElementsByClassName("hms")[0].innerHTML = currentTime;
    document.getElementsByClassName("ampm")[0].innerHTML = ampm;

    /* date */
    var dow = [
        "Sunday",
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday"
      ],
      month = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
      ],
      day = dateInfo.getDate();

    // store date
    var currentDate = dow[dateInfo.getDay()] + ", " + month[dateInfo.getMonth()] + " " + day;

    document.getElementsByClassName("date")[0].innerHTML = currentDate;
  };

  // print time and date once, then update them every second
  updateTime();
  setInterval(function() {
    updateTime()
  }, 1000);
  </script>
</html>