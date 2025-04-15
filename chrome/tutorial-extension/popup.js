document.getElementById("start").addEventListener("click", async () => {
    console.log('gogoglddddd');
    let [tab] = await chrome.tabs.query({ active: true, currentWindow: true });
    chrome.scripting.executeScript({
      target: { tabId: tab.id },
      func: runEtherscanTutorial
    });
});
  
function runEtherscanTutorial() {
    alert("Tutorial starting!"); // Will pop up in the Etherscan tab
    window.postMessage({ action: "run-tutorial" }, "*");
}
  