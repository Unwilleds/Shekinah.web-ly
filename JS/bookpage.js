document.addEventListener("DOMContentLoaded", () => {
  const sections = document.querySelectorAll(".section");
  const sidebarItems = document.querySelectorAll(".sidebar li");
  const calendarDaysContainer = document.querySelector(".calendar-days");
  const serviceDropdown = document.querySelector("#service");
  // const servicePriceDisplay = document.querySelector("#service-price");
  const monthSelector = document.querySelector("#month-selector");
  const yearSelector = document.querySelector("#year-selector");
  const prevMonthButton = document.querySelector("#prev-month");
  const nextMonthButton = document.querySelector("#next-month");
  const summaryFields = {
    service: document.querySelector("#summary-service"),
    date: document.querySelector("#summary-date"),
    name: document.querySelector("#summary-name"),
    email: document.querySelector("#summary-email"),
    payment: document.querySelector("#summary-payment"),
  };
  const finish = document.querySelector(".finish");
  const finishButton = document.querySelector("#finish-button");
  const nextButtons = document.querySelectorAll(".next-button");
  const prevButtons = document.querySelectorAll(".prev-button");

  const e1 = document.querySelector(".e1");
  const e2 = document.querySelector(".e2");
  const e3 = document.querySelector(".e3");
  const e4 = document.querySelector(".e4");
  const e5 = document.querySelector(".e5");
  const e6 = document.querySelector(".e6");

  let currentSection = 0;
  let selectedDate = null;
  let selectedTime = null;
  let selectedService = null;
  // let selectedPrice = null;
  let userInfo = {};
  let paymentMethod = null;

  const months = [
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
    "December",
  ];

  const currentDate = new Date();
  let bookedDatesCache = []; // Cache for booked dates

  // Fetch booked dates and their booking types
  const fetchBookedDates = async () => {
    try {
      const response = await fetch("../../Pages/book-fetch.php");
      // Expected format: [{ date: "YYYY-MM-DD", type: "day" }, { date: "YYYY-MM-DD", type: "wholeday" }]
      bookedDatesCache = await response.json();
    } catch (error) {
      console.error("Error fetching booked dates:", error);
      bookedDatesCache = [];
    }
  };

  // Display time slots based on booking availability
  const displayTimeSlots = (date) => {
    const timeContainer = document.getElementById("time-section");
    timeContainer.innerHTML = ""; // Clear previous slots

    const booking = bookedDatesCache.find((entry) => entry.date === date);
    const header1 = document.createElement("h1");

    header1.innerHTML = "Time";
    timeContainer.appendChild(header1);

    if (booking) {
      const { type } = booking;
      const availableSlots = [];

      // Determine available slots
      if (type === "Day (8am - 5pm)") {
        availableSlots.push("Night (6pm - 12mn)");
      } else if (type === "Night (6pm - 12mn)") {
        availableSlots.push("Day (8am - 5pm)");
      } else if (type === "Whole Day (8am - 12mn)") {
        availableSlots.length = 0; // All slots unavailable
        console.log("no slots");
      } else {
        availableSlots.push(
          "Day (8am - 5pm)",
          "Night (6pm - 12mn)",
          "Whole Day (8am - 12mn)"
        );
      }

      availableSlots.forEach((slot) => {
        const timeButton = document.createElement("button");
        timeButton.className = "time-btn";
        timeButton.textContent = slot;
        timeButton.value = slot;
        timeButton.addEventListener("click", () => {
          document
            .querySelectorAll(".time-btn")
            .forEach((t) => t.classList.remove("active"));
          timeButton.setAttribute("id", "timeActive");

          timeButton.classList.add("active");
          selectedTime = timeButton.value;
          updateSummary(); // Update reservation summary
        });
        timeContainer.appendChild(timeButton);
      });

      timeContainer.style.display = availableSlots.length > 0 ? "flex" : "none";
    } else {
      // If no booking exists for the day, show all slots
      [
        "Day (8am - 5pm)",
        "Night (6pm - 12mn)",
        "Whole Day (8am - 12mn)",
      ].forEach((slot) => {
        const timeButton = document.createElement("button");
        timeButton.className = "time-btn";
       
        timeButton.value = slot;
        timeButton.textContent = slot;
        timeButton.addEventListener("click", () => {
          document
            .querySelectorAll(".time-btn")
            .forEach((t) => {
              t.classList.remove("active")
              timeButton.setAttribute("id", "")
            });
          timeButton.classList.add("active");
          timeButton.setAttribute("id", "timeActive");
          selectedTime = timeButton.value;
          updateSummary();
        });
        timeContainer.appendChild(timeButton);
      });

      timeContainer.style.display = "flex";
    }
  };

  // Update day click logic to show time slots
  const createDayElement = (text, className, date = null) => {
    const dayElement = document.createElement("div");
    const d_t_section = document.getElementById("date-time-main");
    dayElement.className = `day ${className}`;
    dayElement.textContent = text;
    if (
      date &&
      (className === "available" || className === "partially-booked")
    ) {
      dayElement.setAttribute("data-date", date);
      dayElement.addEventListener("click", () => {
        document
          .querySelectorAll(".day")
          .forEach((d) => d.classList.remove("selected"));
        dayElement.classList.add("selected");
        dayElement.setAttribute("id", "daySelected");
        selectedDate = date;
        displayTimeSlots(date);
        d_t_section.scrollBy(0, 500);
        updateSummary();
      });
    }
    return dayElement;
  };

  // Add styles for fully and partially booked days
  const styleCalendar = () => {
    const style = document.createElement("style");
    style.textContent = `
      .fully-booked { background-color: red; color: black; cursor: not-allowed; }
      .partially-booked { background-color: orange; color: black; cursor: pointer; }
      .disabled { opacity: 0.5; cursor: not-allowed; }
      .time-slot { margin: 5px; padding: 10px; border: 1px solid #ddd; cursor: pointer; }
      .time-slot.selected { background-color: #007bff; color: white; }
    `;
    document.head.appendChild(style);
  };

  // Function to populate the calendar and apply the booking logic
const populateCalendar = (year, month) => {
  calendarDaysContainer.innerHTML = ""; // Clear previous calendar days

  const daysInMonth = new Date(year, month + 1, 0).getDate();
  const firstDay = new Date(year, month, 1).getDay();

  const today = new Date();
  today.setHours(0, 0, 0, 0); // Set time to midnight for comparison

  const getLocalDate = (date) => {
    const localDate = new Date(date);
    localDate.setHours(0, 0, 0, 0); // Normalize to midnight for accurate comparisons
    return localDate;
  };

  // Add blank days for alignment
  const blanks = firstDay === 0 ? 6 : firstDay - 1;
  for (let i = 0; i < blanks; i++) {
    calendarDaysContainer.appendChild(createDayElement("", "blank"));
  }

  // Populate the calendar days
  for (let day = 1; day <= daysInMonth; day++) {
    const date = new Date(year, month, day);
    const formattedDate = getLocalDate(date).toISOString().split("T")[0];

    // Check if both Day and Night slots are booked
    const dayBooking = bookedDatesCache.find(
      (entry) => entry.date === formattedDate && entry.type === "Day (8am - 5pm)"
    );
    const nightBooking = bookedDatesCache.find(
      (entry) => entry.date === formattedDate && entry.type === "Night (6pm - 12mn)"
    );

    const isBooked = dayBooking || nightBooking;
    const isPartial = isBooked && !(dayBooking && nightBooking);

    // Check if both day and night are booked for the same date (fully booked)
    const isFullyBooked = dayBooking && nightBooking;

    // Determine class based on booking status
    let dayClass = "available";
    if (isFullyBooked) {
      dayClass = "fully-booked"; // Mark as fully booked (red)
    } else if (isPartial) {
      dayClass = "partially-booked"; // Partially booked (orange)
    }

    const isPastDate = getLocalDate(date) < getLocalDate(today);
    if (isPastDate) {
      dayClass = "disabled"; // Disable past dates
    }

    const dayElement = createDayElement(day, dayClass, formattedDate);

    // Disable past dates and apply opacity
    if (isPastDate) {
      dayElement.style.opacity = "0.5";
      dayElement.style.cursor = "not-allowed";
    }

    calendarDaysContainer.appendChild(dayElement);
  }
};

  const handleChange = () => {
    const selectedMonth = parseInt(monthSelector.value, 10);
    const selectedYear = parseInt(yearSelector.value, 10);
    console.log("Selected Month:", selectedMonth, "Selected Year:", selectedYear);
    populateCalendar(selectedYear, selectedMonth);
  };

  monthSelector.addEventListener("change", handleChange);
  yearSelector.addEventListener("change", handleChange);

  // Month navigation
  const handleMonthNavigation = () => {
    prevMonthButton.addEventListener("click", () => {
      const currentMonth = parseInt(monthSelector.value, 10);
      if (currentMonth === 0) {
        monthSelector.value = "11";
        yearSelector.value = (parseInt(yearSelector.value, 10) - 1).toString();
      } else {
        monthSelector.value = (currentMonth - 1).toString();
      }
      handleChange();
    });

    nextMonthButton.addEventListener("click", () => {
      const currentMonth = parseInt(monthSelector.value, 10);
      if (currentMonth === 11) {
        monthSelector.value = "0";
        yearSelector.value = (parseInt(yearSelector.value, 10) + 1).toString();
      } else {
        monthSelector.value = (currentMonth + 1).toString();
      }
      handleChange();
    });
  };

  const populateSelectors = () => {
    monthSelector.innerHTML = "";
    yearSelector.innerHTML = "";

    months.forEach((month, index) => {
      const option = new Option(month, index);
      if (index === currentDate.getMonth()) {
        option.selected = true;
      }
      monthSelector.appendChild(option);
    });

    const currentYear = currentDate.getFullYear();
    for (let year = currentYear - 5; year <= currentYear + 5; year++) {
      const option = new Option(year, year);
      if (year === currentYear) {
        option.selected = true;
      }
      yearSelector.appendChild(option);
    }
  };


  const date = new Date(currentDate); // Assume date is stored in UTC
  const localDate = new Date(date.getTime() + date.getTimezoneOffset() * 60000); // Convert to local time

  // Now display the localDate correctly on the calendar
  console.log(localDate.toDateString());

  console.log("Booked Dates Cache:", bookedDatesCache);

  // Handle Service Selection
  const handleServiceSelection = () => {
    const eventSummaryDisplay = document.querySelector("#event-summary");

    // Map of event types to summaries
    const eventSummaries = {
      event: `
        <strong>Event Package (up to 100 people):</strong>
        <ul>
          <li><strong>Usage:</strong> 16 hours.</li>
          <li><strong>Features:</strong>
            <ul>
              <li>Infinity swimming pool with Jacuzzi, air-conditioned studio room (queen-sized bed).</li>
              <li>Non-air-conditioned pavilion, 12-seater dining table, bar area with sink, comfort/shower rooms.</li>
              <li>Chairs and tables (100 pax), water dispenser, purified water container, free grill.</li>
              <li>Videoke (until 10 PM), open cabana cottage, service area with sink/prep area.</li>
              <li>Spacious parking, 24-hour CCTV.</li>
            </ul>
          </li>
        </ul>`,
      "pool-non-ac": `
        <strong>Pool Event - Non Airconditioned (20 people):</strong>
        <ul>
          <li><strong>Usage:</strong> Day: 8:00 AM - 5:00 PM; Night: 6:00 PM - 12:00 AM.</li>
          <li>₱250/head for more than 20 pax; ₱800/hour for extension.</li>
          <li><strong>Features:</strong>
            <ul>
              <li>Infinity swimming pool with Jacuzzi, outdoor lounge chairs, open pavilion.</li>
              <li>Comfort/shower rooms, kitchen sink, ventilation.</li>
              <li>Chairs and tables (20 pax), 3 long tables, water dispenser, purified water container.</li>
              <li>Videoke (until 10 PM), free grill, cabana cottage, half-court basketball.</li>
              <li>Spacious parking, 24-hour CCTV.</li>
              <li>Catering is <strong>not allowed</strong>.</li>
            </ul>
          </li>
        </ul>`,
      "pool-ac": `
        <strong>Pool Event - With Airconditioned Studio Room (25 people):</strong>
        <ul>
          <li><strong>Features:</strong>
            <ul>
              <li>Infinity swimming pool with Jacuzzi, air-conditioned studio room (queen-sized bed).</li>
              <li>Outdoor lounge chairs, open pavilion, bar area with sink, dining table.</li>
              <li>Refrigerator, microwave oven, comfort/shower rooms (2 total).</li>
              <li>Chairs and tables (25 pax), water dispenser, purified water container, videoke (until 10 PM).</li>
              <li>Cabana cottage, half-court basketball court, spacious parking, 24-hour CCTV.</li>
            </ul>
          </li>
        </ul>`,
    };

    serviceDropdown.addEventListener("change", () => {
      const selectedOption = serviceDropdown.selectedOptions[0];
      selectedService = selectedOption.textContent;

      // const guests = selectedOption.getAttribute("data-guests");
      // displayGuests.textContent = ${guests};

      const selectedOptions = serviceDropdown.value;
      const summary =
        eventSummaries[selectedOptions] ||
        "<p>Please select a valid event type.</p>";
      eventSummaryDisplay.innerHTML = summary;

      updateSummary();
      collectPaymentMethod();
      console.log(selectedService);
    });
  };

  // Collect User Info
  const collectUserInfo = () => {
    const userInfoForm = document.querySelector("#user-info-form");
    if (userInfoForm) {
      const inputs = userInfoForm.querySelectorAll("input");
      inputs.forEach((input) => {
        input.addEventListener("change", () => {
          userInfo[input.id] = input.value.trim();
          updateSummary();
        });
      });
    }
  };

  // Collect Payment Method
  const collectPaymentMethod = () => {
    const paymentMethodSelect = document.querySelector("#payment-method");
    const paymentOnlineMethodSelected = document.querySelector(
      "#online-payment-group"
    );
    const paymentMethodOnline = document.querySelector(
      "#payment-method-online"
    );
    const paymentOnsiteMethodSelected =
      document.querySelector("#onsite-payment");
    const payment = document.querySelector("#payment");

    const initialOption = serviceDropdown.selectedOptions[0];
    const amount = document.querySelector("#amounts");
    const payNowBtn = document.querySelector(".payNow");
    const balanceElement = document.querySelector(".balance");

    const selectedPrice = initialOption.getAttribute("data-price");
    if (serviceDropdown) {
      document.querySelectorAll(".subTotal, .total").forEach((subTotal) => {
        subTotal.textContent = selectedPrice;
      });
    }

    document.querySelectorAll(".event").forEach((events) => {
      events.textContent = selectedService;
    });

    if (paymentMethodOnline) {
      paymentMethodOnline.addEventListener("change", () => {
        const paymentMethodOl = paymentMethodOnline.value;
        document.querySelector(".eWallet").textContent = paymentMethodOl;
      });
    }

    if (paymentMethodSelect) {
      paymentMethodSelect.addEventListener("change", () => {
        paymentMethod = paymentMethodSelect.value;

        if (paymentMethod == "Online Payment") {
          payment.style.display = "flex";
          paymentOnlineMethodSelected.style.display = "flex";
          paymentOnsiteMethodSelected.style.display = "none";
          return true; // Stop further processing

        } else {
          paymentOnsiteMethodSelected.style.display = "flex";
          payment.style.display = "none";
          paymentOnlineMethodSelected.style.display = "none";
         
          payNowBtn.addEventListener("click", () => {
            // Get the selected service option for precise pricing
            const selectedServiceOption =
              serviceDropdown.options[serviceDropdown.selectedIndex];
            const prices = selectedServiceOption.getAttribute("data-price");
    
            // Remove any non-digit characters and parse the prices
            const cleanSelectedPrice = prices.replace(/[^\d]/g, "");
            const selectedPriceValue = parseInt(cleanSelectedPrice) || 0;
            const amountValue = parseInt(amount.value) || 0;
    
            // Validate payment amount
            if (amountValue < selectedPriceValue) {
              // Create a more specific error message based on the service type
              const serviceName = selectedServiceOption.text;
             
              e1.style.display = "block";
              e1.innerHTML = `Insufficient payment for ${serviceName}. Minimum amount required is ₱${selectedPriceValue.toLocaleString()}.`
              setTimeout(() => {
                e1.style.display = "none";
              }, 3000);
              amount.value = ""; // Clear the input
              balanceElement.textContent = "0"; // Reset balance
              return false; // Stop further processing
            } 
    
            
    
            // If amount is sufficient, proceed with payment processing
            document.querySelector(".online-payment").style.display = "flex";
            document.querySelector(
              ".paid"
            ).textContent = `${amountValue.toLocaleString()}`;
    
            // Calculate the balance
            const balance = amountValue - selectedPriceValue;
    
            // Update the balance element
            balanceElement.textContent = `₱ ${balance.toLocaleString()}`;
    
            payNowBtn.setAttribute("disabled", true);
            amount.setAttribute("readonly", true);
          });
          if (document.querySelector(".online-payment").style.display === "none"){
            console.log("oo na");
            return false;
          } 
        }
        updateSummary();
        console.log(paymentMethod);
      });

     return true;
      
    }
   
  };
  

  // Populate Summary
  const populateSummary = () => {
    finish.addEventListener("click", () => {
      console.log({
        selectedService,
        selectedDate,
        selectedTime,
        userInfo,
        paymentMethod,
      });

      if (
        !selectedService ||
        !selectedDate ||
        !selectedTime ||
        !userInfo["full-name"] ||
        !paymentMethod
      ) {
        e1.style.display = "block";
        setTimeout(() => {
          e1.style.display = "none";
        }, 3000);
        return;
      }
      const email = document.querySelector("#summary-email").getAttribute("data-email");

      // Proceed with populating the summary
      summaryFields.service.textContent = selectedService || "Not selected";
      summaryFields.date.textContent = selectedDate || "Not selected";
      summaryFields.date.textContent = selectedTime || "Not selected";
      summaryFields.name.textContent =
        `${userInfo["full-name"]}` || "Not provided";
      summaryFields.email.textContent = email || "Not provided";
      summaryFields.payment.textContent = paymentMethod || "Not selected";
      updateSummary();
    });

    // finishButton.addEventListener("click", () => {
    //   e5.style.display = "block";
    //   setTimeout(() => {
    //     e5.style.display = "none";
    //   }, 3000);
    // });
  };

  // Next and Previous button functionality
  const handleNavigation = () => {
    const navigateToSection = (direction) => {
      // Validate current section before moving
      const canProceed = direction === "prev" || validateCurrentSection();

      if (canProceed) {
        // Update section based on direction
        currentSection += direction === "next" ? 1 : -1;

        // Ensure section stays within bounds
        currentSection = Math.max(
          0,
          Math.min(currentSection, sections.length - 1)
        );

        updateSections();
      } else if (direction === "next") {
        e3.style.display = "block";
        setTimeout(() => {
          e3.style.display = "none";
        }, 3000);
      }
    };

    // Add event listeners to next buttons
    nextButtons.forEach((button) => {
      button.addEventListener("click", () => {
        navigateToSection("next");
      });
    });

    // Add event listeners to previous buttons
    prevButtons.forEach((button) => {
      button.addEventListener("click", () => navigateToSection("prev"));
    });
  };

  // Setup Sidebar Navigation with Validation
  const setupSidebarNavigation = () => {
    sidebarItems.forEach((item, index) => {
      item.addEventListener("click", () => {
        // Ensure the user cannot skip sections
        const canProceed =
          index <= currentSection || validateAllPreviousSections(index);

        if (canProceed) {
          currentSection = index;

          // Ensure section stays within bounds
          currentSection = Math.max(
            0,
            Math.min(currentSection, sections.length - 1)
          );

          updateSections();
        } else {
          e4.style.display = "block";
          setTimeout(() => {
            e4.style.display = "none";
          }, 3000);
        }
      });
    });
  };

  // Validate all previous sections
  const validateAllPreviousSections = (targetSectionIndex) => {
    for (let i = 0; i < targetSectionIndex; i++) {
      if (!validateSection(i)) {
        return false;
      }
    }
    return true;
  };

  const validateSection = (sectionIndex) => {
    switch (sectionIndex) {
      case 0: // Service Selection
        return selectedService && selectedService.trim();
      case 1: // Date & Time
        return selectedDate && selectedTime;
      case 2: // User Information
        return checkValidity();
      case 3: // Payment
        return paymentMethod && paymentMethod.trim() && collectPaymentMethod();
      default:
        return true;
    }
  };

  const validateCurrentSection = () => validateSection(currentSection);

  const checkValidity = () => {
    const name = document.querySelector("#full-name");
    const guest = document.querySelector("#guest");
    const phone = document.querySelector("#phone");

    const nameRegex = /^[A-Za-z\s]+$/;
    const guestRegex = /^[0-9]+$/;
    const phoneRegex = /^[0-9]{11}$/;

    if (!nameRegex.test(name.value.trim())) {
      return false; // Name invalid
    }
    if (!guestRegex.test(guest.value.trim())) {
      return false; // Guest input invalid
    }
    if (!phoneRegex.test(phone.value.trim())) {
      return false; // Phone input invalid
    }

    return true;
  };

  // Update sections visibility
  const updateSections = () => {
    sections.forEach((section, index) => {
      section.classList.toggle("hidden", index !== currentSection);
    });
    sidebarItems.forEach((item, index) => {
      item.classList.toggle("active", index === currentSection);
    });

    // Disable previous button on first section, next button on last section
    if (prevButtons.length) {
      prevButtons.forEach((button) => {
        button.disabled = currentSection === 0;
      });
    }
    if (nextButtons.length) {
      nextButtons.forEach((button) => {
        button.disabled = currentSection === sections.length - 1;
        button.style.display =
          currentSection === sections.length - 1 ? "none" : "block";
      });
    }
  };

  const updateSummary = () => {
    // Update Service Summary
    const serviceSelect = document.getElementById("service");
    if (serviceSelect) {
      const selectedService =
        serviceSelect.options[serviceSelect.selectedIndex]?.text ||
        "Not selected";
      document.getElementById("summary-service").textContent = selectedService;
    }

    // Update Date and Time Summary
    const selectedDateElement = document.querySelector(".day.selected");
    const selectedTimeElement = document.querySelector(".time-btn.active");
    document.getElementById("summary-date").textContent =
      selectedDateElement?.getAttribute("data-date") || "Not selected";
    document.getElementById("summary-time").textContent =
      selectedTimeElement?.value || "Not selected";

    // Update User Info Summary
    const fullName =
      document.getElementById("full-name")?.value || "Not provided";
    document.getElementById("summary-name").textContent = fullName;

    // Update Payment Summary
    const paymentMethod = document.getElementById("payment-method");
    if (paymentMethod) {
      const selectedPayment =
        paymentMethod.options[paymentMethod.selectedIndex]?.text ||
        "Not selected";
      document.getElementById("summary-payment").textContent = selectedPayment;
    }
  };

  const initialize = async () => {
    try {
      populateSelectors();
      // populateSelectors();
      styleCalendar();
      await fetchBookedDates(); // Ensure booked dates are loaded before rendering
      populateCalendar(currentDate.getFullYear(), currentDate.getMonth());
      handleNavigation();
      handleServiceSelection();
      handleMonthNavigation();
      collectUserInfo();
      collectPaymentMethod();
      populateSummary();
      setupSidebarNavigation();
      updateSections();
    } catch (error) {
      console.error("Initialization error:", error);
      alert("An error occurred while initializing the booking system.");
    }
  };

  initialize();
});

// modal terms and conditions
(function () {
  var $content = $(".modal_info").detach();

  $(".open_button").on("click", function (e) {
    modal.open({
      content: $content,
      width: 540,
      height: 270,
    });
    $content.addClass("modal_content");
    $(".modal1, .modal_overlay").addClass("display");
    $(".open_button").addClass("load");
  });
})();

var modal = (function () {
  var $close = $(
    '<button role="button" class="modal_close" title="Close"><span class="spans"></span></button>'
  );
  var $content = $('<div class="modal_content"/>');
  var $modal = $('<div class="modal1"/>');
  var $window = $(window);

  $modal.append($content, $close);

  $close.on("click", function (e) {
    $(".modal1, .modal_overlay").addClass("conceal");
    $(".modal1, .modal_overlay").removeClass("display");
    $(".open_button").removeClass("load");
    e.preventDefault();
    modal.close();
  });

  return {
    center: function () {
      var top = Math.max($window.height() - $modal.outerHeight(), 0) / 2.25;
      var left = Math.max($window.width() - $modal.outerWidth(), 0) / 2;
      $modal.css({
        top: top + $window.scrollTop(),
        left: left + $window.scrollLeft(),
      });
    },
    open: function (settings) {
      $content.empty().append(settings.content);

      $modal
        .css({
          width: settings.width || "auto",
          height: settings.height || "auto",
        })
        .appendTo("body");

      modal.center();
      $(window).on("resize", modal.center);
    },
    close: function () {
      $content.empty();
      $modal.detach();
      $(window).off("resize", modal.center);
    },
  };
})();


document.getElementById("finish-button").addEventListener("click", function() {
  // Collect data from inputs
  const daySelected = document.getElementById("daySelected").getAttribute("data-date"); // Assuming daySelected exists
  const fullName = document.querySelector("input[name='full-name']").value;
  const service = document.querySelector("#service").value;
  const guestCount = document.querySelector("input[name='guest']").value;
  const phone = document.querySelector("input[name='phone']").value;
  const timeActive = document.querySelector("#timeActive").value;

  // Validate input fields (Optional)
  if (!fullName || !service || !guestCount || !phone || !timeActive) {
      alert("Please fill in all fields.");
      return;
  }

  // Create data object
  const formData = {
      daySelected: daySelected,
      full_name: fullName,
      service: service,
      guest: guestCount,
      phone: phone,
      timeActive: timeActive
  };

  // Send data to server using fetch API
  fetch("book-fetch-times.php", {
      method: "POST",
      headers: {
          "Content-Type": "application/json"
      },
      body: JSON.stringify(formData)
  })
  .then(response => response.text()) // Process server response
  .then(data => {
      console.log(data); // Display server response in console
      document.getElementById("finish-button").addEventListener("click", () => {
      e5.style.display = "block";
      setTimeout(() => {
        e5.style.display = "none";
      }, 3000);
    });
    window.location.reload()
  })
  .catch(error => {
      console.error("Error:", error);
      document.getElementById("finish-button").addEventListener("click", () => {
      e6.style.display = "block";
      setTimeout(() => {
        e6.style.display = "none";
      }, 3000);
    });
  });
});