"""
Download the NLLB-200 model for offline use.
Run this script once before starting the server for the first time.
"""

import os

# Temporarily allow online access to download the model
if "TRANSFORMERS_OFFLINE" in os.environ:
    del os.environ["TRANSFORMERS_OFFLINE"]
if "HF_DATASETS_OFFLINE" in os.environ:
    del os.environ["HF_DATASETS_OFFLINE"]

print("Downloading NLLB-200 model from Hugging Face...")
print("This is a ~2.5GB download and may take several minutes depending on your connection.")
print()

from transformers import AutoTokenizer, AutoModelForSeq2SeqLM

model_name = "facebook/nllb-200-distilled-600M"

print(f"Downloading tokenizer for {model_name}...")
tokenizer = AutoTokenizer.from_pretrained(model_name)
print("✓ Tokenizer downloaded")

print(f"Downloading model weights for {model_name}...")
model = AutoModelForSeq2SeqLM.from_pretrained(model_name)
print("✓ Model downloaded")

print()
print("=" * 70)
print("✅ Model download complete!")
print("=" * 70)
print()
print("The model is now cached locally and you can run the server with:")
print("  python Model/server.py")
print()
