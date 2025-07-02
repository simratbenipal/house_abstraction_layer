# IoT-Based Electric Appliances Management System

Southern Alberta Institute of Technology, SAIT, 2020 Capstone Project

A smart home automation project designed to remotely control and monitor electric appliances using Raspberry Pi, Zigbee, and a custom-built web platform. This system allows users to manage smart lights, thermostats, and outlets through an intuitive interface with scheduling and security features.

## 🚀 Features

- 🔌 Control smart electric appliances (lights, thermostat, outlets)
- 🌐 Web-based interface built with PHP and Python
- ⏰ Schedule-based automation for energy efficiency
- 🛡️ Centralized logging system for intrusion detection and system health monitoring
- 📡 Communication through Zigbee protocol and Raspberry Pi

## 🛠️ Tech Stack

- **Hardware:** Raspberry Pi, Zigbee Modules, Smart Thermostate (Honeywell), Philips Smart Lights
- **Backend:** Python, MySQL  
- **Frontend:** PHP, HTML/CSS  
- **Database:** MySQL  
- **Communication Protocol:** Zigbee  
- **Scheduling & Automation:** Custom Python scripts  
- **Security:** Logging and unauthorized access detection using pfSense

## 📅 Automation

- Users can schedule specific times for devices to turn on/off.
- Automation rules are stored in the database and executed via background scripts.

## 🔐 Security

- Centralized logging of unauthorized access attempts.
- Real-time alerts and monitoring.
- Logs stored for audit and review.

## 📷 System Architecture

[User Interface] <---> [Web Server (PHP + Python)] <---> [Raspberry Pi] <---> [Zigbee Coordinator] <---> [Smart Light] [Thermostat] [Power Outlet]


## 📌 Future Improvements

- Add mobile app support.
- Integrate with voice assistants (Alexa, Google Assistant).
- Expand to additional device types and sensors.

---

Feel free to fork, contribute, or open issues!
