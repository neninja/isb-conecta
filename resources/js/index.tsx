import "./bootstrap";
import React from 'react';
import ReactDOM from 'react-dom';
import { App } from './App';
import { initFakeApiServer } from './fakeapi'

if(deveMockarApi()){
    initFakeApiServer()
}

ReactDOM.render(
  <React.StrictMode>
      <App />
  </React.StrictMode>,
  document.getElementById('app')
);

function deveMockarApi() {
    return !!process.env.MIX_GHPAGES_TEST;
}
