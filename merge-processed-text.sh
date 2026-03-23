#!/bin/bash

# Usage: ./merged.sh <directory> [output_file]


rm merged.txt

# Concatenate all .txt files in the directory, sorted alphabetically, safely
find "./img/1844/mercury" -maxdepth 1 -type f -name "*.processed.txt" | sort | while IFS= read -r f; do
    cat "$f" >> "merged.txt"
    echo "" >> "merged.txt"  # optional newline between files
done
