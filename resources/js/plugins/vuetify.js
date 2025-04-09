import "vuetify/styles"
import { createVuetify } from "vuetify"

const lightTheme = {
  dark: false,
  colors: {
    background: "#e3e4e5",
    surface: "#FFFFFF",
    primary: "#201444", // rich purple tone
    "primary-darken-1": "#3700B3",
    secondary: "#03DAC6",
    "secondary-darken-1": "#018786",
    error: "#B00020",
    info: "#2196F3",
    success: "#4CAF50",
    warning: "#FB8C00",
  },
}

export default createVuetify({
  theme: {
    defaultTheme: "lightTheme",
    themes: {
      lightTheme,
    },
  },
})
