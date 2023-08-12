import Person from "./scripts/Person";
import ExampleReactComponent from "./scripts/ExampleReactComponent";
import React from "react";
import ReactDOM from "react-dom";

const person1 = new Person("Iehong");
if (document.querySelector("#render-react-example-here")) {
  ReactDOM.render(
    <ExampleReactComponent />,
    document.querySelector("#render-react-example-here")
  );
}
