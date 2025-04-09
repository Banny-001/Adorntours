export default {
  upload: {
    headers: {
      "Content-type": "multipart/form-data"
    }
  },
  dateRules: [(v) => !!v || "This date is required"],
  inputRules: [(v) => !!v || "This field is required"],
  emailRules: [
    (v) => !!v || "Email is required",
    (v) =>
      /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
        v
      ) || "Email must be in correct format"
  ],
  passportRules: [
    (v) => !!v || "id/passport is required",
    (v) =>
      /([A-Z]|[a-z]|[0-9]){8,9}/.test(v) ||
      "id/passport must be in correct format"
  ],
  formError: "Invalid submission, correct the indicated errors.",
  pdfFileRules: [
    (v) => !!v?.length || "Please attach file",
    (v) =>
      !v ||
      !v.length ||
      v[0].type === "application/pdf" ||
      "Only PDF attachments are allowed"
  ],
  optionalPdfFileRules: [
    (v) =>
      !v?.length
        ? true
        : !v.length ||
          v[0].type === "application/pdf" ||
          "Only PDF attachments are allowed"
  ],
  optionalPdfFileRules: [
    (v) =>
      !v ||
      !v.length ||
      v[0].type === "application/pdf" ||
      "Only PDF attachments are allowed"
  ],
  excelFileRules: [
    (v) => !!v?.length || "Please attach file",
    (v) =>
      !v ||
      !v.length ||
      v[0].type === "application/vnd.ms-excel" ||
      v[0].type ===
        "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" ||
      "Only Excel file attachments are allowed"
  ],

  optionalExcelFileRules: [
    (v) =>
      v &&
      v[0] &&
      (v[0].type === "application/vnd.ms-excel" ||
        v[0].type ===
          "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
        ? true
        : "Only Excel file attachments are allowed"
  ],
  unsignedIntRules: [
    (v) => !!v || "This field is required",
    (v) =>
      /(^[^\-]{0,1})?(^[\d]*)$/.test(v) ||
      "Invalid: input must be non-negative integer"
  ],
  idRequired: [
    (v) => !!v || "This field is required",
    (v) =>
      /(^[^\-]{0,1})?(^[\d]*)$/.test(v?.id) ||
      "Invalid: Invalid input. Please select from list"
  ],
  unsignedNumberRules: [
    (v) => !!v || "This field is required",
    (v) =>
      /^([^\-])?\d+(.\d+)?/.test(v) ||
      "Invalid: input must be non-negative number"
  ],
  yearRules: [
    (v) =>
      v <= new Date().getFullYear() ||
      `Year should be below ${new Date().getFullYear() + 1}`,
    (v) => v > 1899 || `Year should be greater than ${1899}`
  ],
  numericOnlyRules: [
    (v) => !!v || "This field is required",
    (v) =>
      /^([^\-])?\d+(.\d+)?/.test(v) ||
      "Invalid: input must contain only numeric characters and commas"
  ],
  websiteRules: [
    (v) =>
      !v ||
      /https?:\/\/(www\.)?[a-z0-9.-]+\.[a-z]{2,4}/.test(v) ||
      "Website must be valid"
  ],
  passwordRules: [
    (v) => !!v || "Password is required",
    (v) => (v && v.length >= 8) || "Minimum 8 characters",
    (v) =>
      /(?=.*[A-Z])/.test(v) || "Must have at least one uppercase character",
    (v) => /(?=.*\d)/.test(v) || "Must have at least one number"
  ],
  READ_ONLY_TEXT_FIELD_BG: "grey-lighten-2",
  generalError: "An error occured."
};
