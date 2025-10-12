import puppeteer from "puppeteer";

const url = process.argv[2];

if (!url) {
    console.error("Missing URL");
    process.exit(1);
}

(async () => {
    const browser = await puppeteer.launch({
        headless: true,
        args: ['--no-sandbox', '--disable-setuid-sandbox']
    });

    const page = await browser.newPage();
    await page.goto(url, { waitUntil: 'networkidle2', timeout: 60000 });

    // 获取渲染后 HTML
    const content = await page.content();
    console.log(content);

    await browser.close();
})();
