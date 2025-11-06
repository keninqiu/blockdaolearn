import puppeteer from "puppeteer";

(async () => {
    const browser = await puppeteer.launch({ headless: false });
    const page = await browser.newPage();

    await page.goto('https://chat.openai.com/');

    // Wait for login page, input email/password manually or automate with care
    // Then navigate to chat interface

    // Example: type a message
    await page.type('textarea[name="prompt-textarea"]', 'Translate "Hello world" to Chinese');
    await page.keyboard.press('Enter');

    // Wait for response
    await page.waitForSelector('.result-message-selector'); // Replace with actual class
    const reply = await page.$eval('.result-message-selector', el => el.innerText);
    console.log(reply);

    await browser.close();
})();
