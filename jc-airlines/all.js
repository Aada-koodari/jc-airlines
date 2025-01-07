        // Function to show flight details and display the passenger input form
        function showFlightDetails() {
            const flightData = <?php echo json_encode($flightDetails); ?>;

            // Fill in the flight details dynamically
            document.getElementById('flightDate').innerText = flightData.date;
            document.getElementById('flightTime').innerText = flightData.time;
            document.getElementById('departureCity').innerText = flightData.whereFrom;
            document.getElementById('destinationCity').innerText = flightData.whereTo;
            document.getElementById('ticketCount').innerText = flightData.passengers;

            // Show the correct number of passenger input fields based on the number of tickets
            const ticketCount = flightData.passengers;
            const passengerForm = document.getElementById('passengerForm');
            passengerForm.innerHTML = '';  // Clear any existing fields

            for (let i = 0; i < ticketCount; i++) {
                const passengerDiv = document.createElement('div');
                passengerDiv.classList.add('passenger');
                passengerDiv.innerHTML = `
                    <h4>Passenger ${i + 1}</h4>
                    <input type="text" class="name" placeholder="Full Name" name="passengers[${i}][name]" required>
                    <input type="text" class="address" placeholder="Address" name="passengers[${i}][address]" required>
                    <input type="email" class="email" placeholder="Email" name="passengers[${i}][email]" required>
                    <input type="tel" class="phone" placeholder="Phone Number" name="passengers[${i}][phone]" required>
                `;
                passengerForm.appendChild(passengerDiv);
            }

            // Show the form with the generated passenger fields
            passengerForm.style.display = 'block';
        }

        // Handle form submission
        function submitBooking() {
            const passengers = document.getElementsByClassName('passenger');
            const passengerDetails = [];

            // Collect passenger details
            for (let i = 0; i < passengers.length; i++) {
                const name = passengers[i].querySelector('.name').value;
                const address = passengers[i].querySelector('.address').value;
                const email = passengers[i].querySelector('.email').value;
                const phone = passengers[i].querySelector('.phone').value;

                passengerDetails.push({ name, address, email, phone });
            }

            // Add passenger details to the form and submit
            const form = document.getElementById('bookingForm');
            const passengerInput = document.createElement('input');
            passengerInput.type = 'hidden';
            passengerInput.name = 'passengers';
            passengerInput.value = JSON.stringify(passengerDetails);
            form.appendChild(passengerInput);

            // Get flight details from the already displayed values and add them to the form
            const pvm = document.getElementById('flightDate').innerText;
            const lennonAjankohta = document.getElementById('flightTime').innerText;
            const kohdeKaupunki = document.getElementById('destinationCity').innerText;
            const lippujenMaara = document.getElementById('ticketCount').innerText;

            const pvmInput = document.createElement('input');
            pvmInput.type = 'hidden';
            pvmInput.name = 'pvm';
            pvmInput.value = pvm;
            form.appendChild(pvmInput);

            const lennonAjankohtaInput = document.createElement('input');
            lennonAjankohtaInput.type = 'hidden';
            lennonAjankohtaInput.name = 'lennonAjankohta';
            lennonAjankohtaInput.value = lennonAjankohta;
            form.appendChild(lennonAjankohtaInput);

            const kohdeKaupunkiInput = document.createElement('input');
            kohdeKaupunkiInput.type = 'hidden';
            kohdeKaupunkiInput.name = 'kohdeKaupunki';
            kohdeKaupunkiInput.value = kohdeKaupunki;
            form.appendChild(kohdeKaupunkiInput);

            const lippujenMaaraInput = document.createElement('input');
            lippujenMaaraInput.type = 'hidden';
            lippujenMaaraInput.name = 'lippujenMaara';
            lippujenMaaraInput.value = lippujenMaara;
            form.appendChild(lippujenMaaraInput);

            // Submit the form
            form.submit();
        }