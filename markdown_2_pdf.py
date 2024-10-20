import markdown
import pdfkit

# Function to convert markdown to PDF
def markdown_to_pdf(markdown_text, output_pdf_path):
    # Convert Markdown to HTML
    html = markdown.markdown(markdown_text)

    # Convert HTML to PDF
    pdfkit.from_string(html, output_pdf_path)

# Example Markdown text
markdown_text = """

### Discover Travelobby: Your Gateway to Unforgettable Travel Experiences

In an age where travel has become more accessible than ever, the desire for unique and memorable experiences is at an all-time high. Enter  **Travelobby**, a fresh and innovative company dedicated to transforming how you explore the world. Our mission is to connect travelers with authentic adventures, making every journey not just a trip but a treasured memory.

#### Who We Are

At Travelobby, we believe that travel should be about more than just visiting popular destinations. Our team is passionate about curating personalized travel experiences that reflect the diverse interests and needs of our clients. Whether you’re seeking an adrenaline-pumping adventure, a tranquil retreat, or a cultural immersion, we’ve got you covered.

#### What Sets Us Apart

1.  **Tailored Experiences**: We understand that every traveler is unique. Our expert travel consultants work closely with you to design a customized itinerary that suits your preferences, budget, and style.
    
2.  **Local Insights**: Our deep-rooted connections with local guides and communities allow us to offer insider tips and hidden gems that you won’t find in guidebooks. Experience a destination like a local, not just a tourist.
    
3.  **Sustainable Travel**: Travelobby is committed to promoting sustainable tourism. We prioritize eco-friendly practices and support local businesses, ensuring that your travels positively impact the communities you visit.
    
4.  **24/7 Support**: Traveling can come with its challenges. That’s why we offer round-the-clock support to assist you with any issues that may arise during your trip, ensuring peace of mind from start to finish.
    

#### Join the Travelobby Community

As we embark on this exciting journey, we invite you to join the Travelobby community. Follow us on our social media channels and subscribe to our newsletter for travel tips, inspiration, and exclusive offers.

Whether you're planning your next getaway or dreaming of far-off destinations, Travelobby is here to make your travel dreams a reality. Discover the world through a new lens with Travelobby—where your adventure begins!

### Connect with Us

To learn more about our services or start planning your next adventure, visit our website at  [Travelobby.com](#)  or reach out to us directly. Let’s explore the world together!
"""

# Output PDF file path
output_pdf_path = 'output.pdf'

# Convert the markdown to PDF
markdown_to_pdf(markdown_text, output_pdf_path)

print(f"PDF generated: {output_pdf_path}")
