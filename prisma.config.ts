import "dotenv/config";
import { defineConfig } from "@prisma/config"; // Adicionado o @

export default defineConfig({
  schema: "prisma/schema.prisma",
  datasource: {
    url: process.env.DATABASE_URL, // Simplificado o acesso à variável
  },
});