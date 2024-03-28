<?php
// Include the class that allows rendering components
require_once("./handlers/Page.php");

// Render the header component
Page::part("header");

// Render the form component
Page::part("form");

// Render the comments component
Page::part("comments");

// Render the footer component
Page::part("footer");
