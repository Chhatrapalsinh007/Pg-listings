async function getCities() {
    const stateSelect = document.getElementById('state-select');
    const citySelect = document.getElementById('city-select');
    const selectedState = stateSelect.value;

    const apiUrl = 'https://countriesnow.space/api/v0.1/countries/state/cities';
    const requestData = {
        country: "India",
        state: selectedState
    };

    try {
        const response = await fetch(apiUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(requestData)
        });

        const data = await response.json();

        if (data && data.data && data.data.length > 0) {
            citySelect.innerHTML = ''; // Clear current city options
            data.data.forEach(city => {
                const option = document.createElement('option');
                option.value = city;
                option.textContent = city;
                citySelect.appendChild(option);
            });

            // Refresh the nice-select element
            $('#city-select').niceSelect('update');
        }
    } catch (error) {
        console.error('Error fetching cities:', error);
    }
}
