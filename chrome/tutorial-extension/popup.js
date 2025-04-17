document.getElementById("start").addEventListener("click", async () => {
    let [tab] = await chrome.tabs.query({ active: true, currentWindow: true });
    chrome.scripting.executeScript({
      target: { tabId: tab.id },
      func: runEtherscanTutorial
    });
});
  
function runEtherscanTutorial() {
    window.postMessage({ action: "run-tutorial" }, "*");
}
  