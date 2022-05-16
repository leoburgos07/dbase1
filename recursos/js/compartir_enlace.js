var enlace = document.querySelector(".jsEnlace").value;

var dComparteEnlace = document.querySelector(".jsComparteEnlace");

function compartirEnlace() {
  if (navigator.share) {
    navigator
      .share({
        url: enlace,
      })
      .then(() => console.log("Compartiendo enlace"))
      .catch((err) => console.log("Error", err));
  } else {
    alert("Este equipo no tiene la acción de compartir");
  }
}

dComparteEnlace.addEventListener("click", compartirEnlace);
