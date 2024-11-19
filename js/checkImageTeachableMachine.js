// the link to your model provided by Teachable Machine export panel
const URL_MODEL = "./model/";

let model, webcam, labelContainer, maxPredictions;
init();

async function init() {
    const modelURL = URL_MODEL + "model.json";
    const metadataURL = URL_MODEL + "metadata.json";

    model = await tmImage.load(modelURL, metadataURL);
    maxPredictions = model.getTotalClasses();
    console.log(maxPredictions);
}

async function checkGoodFruit() {
    // predict can take in an image, video or canvas html element
    let c = document.getElementById("myCanvas");
    const prediction = await model.predict(c);
    console.log(prediction);


    console.log("Le fruit demandé est : " + fruits[indexOfFruit] + " la prediction pour ce fruit est : " + prediction[indexOfFruit].probability);
    if (prediction[indexOfFruit].probability > 0.9) // l'image proposé est bien le fruit demandé
        return true;
    return false;
}
