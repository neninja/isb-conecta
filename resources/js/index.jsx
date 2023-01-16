// import { createInertiaApp } from '@inertiajs/react'
// import { createRoot } from 'react-dom/client'

// console.log("A")
// createInertiaApp({
//   resolve: name => {
//     const pages = import.meta.glob('./Pages/**/*.jsx', { eager: true })
//     return pages[`./Pages/${name}.jsx`]
//   },
//   setup({ el, App, props }) {
//     createRoot(el).render(<App {...props} />)
//   },
// })


// import "./css/general-sans.css";
// import "./css/index.css";

// import { createRoot } from "react-dom/client";

// import App from "./ReactApp";

// console.log("AA")

// const root = document.getElementById("root");

// if (root) {
//     createRoot(root).render(<App />);
// }


// import { render } from "react-dom";
// import { createInertiaApp } from "@inertiajs/react";

// createInertiaApp({
//     resolve: name => import(`./Pages/${name}.tsx`),
//     setup({ el, App, props }) {
//         render(<App {...props} />, el);
//     }
// });

import { createInertiaApp } from '@inertiajs/react'
import { createRoot } from 'react-dom/client'

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.jsx', { eager: true })
    return pages[`./Pages/${name}.jsx`]
  },
  setup({ el, App, props }) {
    createRoot(el).render(<App {...props} />)
  },
})
