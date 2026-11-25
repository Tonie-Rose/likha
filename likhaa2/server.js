import OpenAI from "openai";

const openai = new OpenAI({
  apiKey: process.env.OPENAI_API_KEY
});

const response = await openai.responses.create({
  model: "gpt-4.1-mini",
  input: "Hello"
});
console.log(process.env.OPENAI_API_KEY);

import path from "path";
import { fileURLToPath } from "url";

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);

app.use(express.static(path.join(__dirname, "public")));
