# This script handles a nested folders and saves to json

import os
import json

SOURCE_PATH = './source/tr_v3'
OUTPUT_JSON_PATH = './file_list.json'
EXLUDED_FOLDERS = [
    './source/tr_v3/fomantic-ui', 
    './source/tr_v3/twig_cache',
    './source/tr_v3/vendor',
    './source/tr_v3/assets'
    ] # I.e ['./your_folder/exclude_folder1', './your_folder/exclude_folder2']  # Exclude folders here

def list_files_recursive(directory, exclude_dirs=None):
    files_list = []
    exclude_dirs = set(os.path.abspath(d) for d in (exclude_dirs or []))

    # Walk through directory tree
    for root, dirs, files in os.walk(directory):
        # Get the absolute path of the current directory
        abs_root = os.path.abspath(root)

        # Skip this directory and its subdirectories if it (or a parent) is in excluded dirs
        if any(abs_root.startswith(excluded) for excluded in exclude_dirs):
            continue

        for file in files:
            # Get relative path
            relative_path = os.path.relpath(os.path.join(root, file), directory)
            # Get file type (extension)
            file_type = os.path.splitext(file)[1][1:]  # Get extension without the dot
            # Append filename, relative path, and file type to the list
            files_list.append({
                "filename": file,
                "relative_path": relative_path,
                "file_type": file_type
            })
    
    return files_list

def save_to_json(data, output_file):
    with open(output_file, 'w') as json_file:
        json.dump(data, json_file, indent=4)

# Example usage:

# List files and save to JSON
file_data = list_files_recursive(SOURCE_PATH, EXLUDED_FOLDERS)
save_to_json(file_data, OUTPUT_JSON_PATH)

print(f"File data has been saved to {OUTPUT_JSON_PATH}")
