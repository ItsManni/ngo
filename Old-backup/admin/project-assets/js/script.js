var _ProductName = "";
fetch('../config/config.json')
  .then(response => response.json())
  .then(configData => {
    // Accessing product name in JavaScript
    _ProductName = configData.product._ProductName;
  });

function ProductAlert(message) {
  alertify.alert(_ProductName, message).set({ transition: "fade" });
}
function appendQueryString(selectedValue)
{
  // Get the current URL
  const url = new URL(window.location.href);

  // Set the 'q' parameter to the selected value
  url.searchParams.set('center', selectedValue);

  // Redirect to the new URL, which will reload the page
  window.location.href = url;
}

function goBack() {
    window.history.back();
}
