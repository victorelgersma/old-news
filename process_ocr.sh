#!/bin/bash

# Usage: ./process.sh <input_image_file_or_directory>


input_path="./img/1844/mercury"

if [ -d "$input_path" ]; then
    echo "Input is a directory. Processing all .png files..."
    
    for input_file in "$input_path"/*.tesseract.txt; do
        if [ -f "$input_file" ]; then
            echo "Processing file: $input_file"
            
            input_dir=$(dirname "$input_file")
            base_filename=$(basename "$input_file" .tesseract.txt)

            python3 post_processing.py $input_file > "$input_dir/${base_filename}.processed.txt"

            echo "Processing complete. Output saved to $input_dir/${base_filename}.processed.txt"
        fi
    done
else
    echo "Error: $input_path is not a valid directory."
fi
