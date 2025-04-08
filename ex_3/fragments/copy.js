function copy(page) {
    fetch(`../exports/export_copy.php?page=${page}`)
      .then((response) => response.text())
      .then((data) => {
        const tmpInput = document.createElement("input");
        tmpInput.value = data;
        tmpInput.select();
        navigator.clipboard.writeText(tmpInput.value)
        .then(() => {
            alert("Data copied to clipboard!");
        })
        .catch((error) => {
            console.error("Error copying to clipboard:", error);
            alert("Failed to copy data.");
        });
      })
      
}