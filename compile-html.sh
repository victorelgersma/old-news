#!/bin/bash

# Define the temporary file
TMP_BODY="tmp_body.html"

# 1. Generate the HTML fragment from Markdown
# The '-t html' flag ensures it doesn't create a full standalone document
pandoc llm/mercury.md -t html -o "$TMP_BODY"

# 2. Construct the final file
{
    echo '<link rel="stylesheet" type="text/css" href="style/tufte.min.css">'
    echo '<article>'
    echo '<section>'
    
    cat "$TMP_BODY"
    
    echo '</section>'
    echo '</article>'
} > html/mercury.html

# 3. Clean up the temp file
rm "$TMP_BODY"