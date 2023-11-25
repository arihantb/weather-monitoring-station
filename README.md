# Weather Monitoring Station

![Header](images/image.png)

## Project Overview

This project, undertaken in our second year, involved the creation of a device to forecast local weather conditions. The developed device captured real-time weather conditions in the surroundings and utilized a 1-hour average window over the day to predict the weather for the following days. Various parameters, including humidity, temperature, pressure, wind speed, precipitation, and Air Quality Index (AQI) measured using a CO2 sensor, were used for accurate predictions. The open-source Indian weather dataset served as the foundation for our analyses.

## Project Significance

As a vital tool for environmental monitoring, the Weather Monitoring Station aimed to provide a comprehensive weather forecasting report for a local area. The significance of this project lies in its potential to enhance preparedness and planning for various activities based on accurate and localized weather predictions.

## Technologies Used

The hardware component utilized an Arduino microcontroller, while Time Series Forecasting techniques, specifically the ARIMA model, were employed for predicting weather conditions. The project was hosted online on AWS EC2 to ensure accessibility and real-time updates.

## Project Workflow

1. **Data Collection:** Real-time weather data, including humidity, temperature, pressure, wind speed, precipitation, and AQI, was collected using the built-in sensors and the CO2 sensor.
2. **Data Processing:** The collected data underwent preprocessing to ensure accuracy and consistency.
3. **Time Series Forecasting:** The ARIMA model was applied to predict future weather conditions based on the 1-hour average window over the day.
4. **Hosting:** The project was hosted online on AWS EC2 to provide real-time weather updates for the local area.

## How to Use

1. **Device Setup:** Install the Weather Monitoring Station device in the desired location.
2. **Access Data:** Retrieve real-time and forecasted weather conditions through the hosted online platform.

## Conclusion

The Weather Monitoring Station project represents a significant step towards localized and accurate weather forecasting. By combining sensor data with advanced forecasting models, the project provides a valuable tool for environmental monitoring and planning.

## Acknowledgements

- [Time Series Forecasting using ARIMA](https://machinelearningmastery.com/arima-for-time-series-forecasting-with-python)
- [NodeMCU and Arduino Communication](https://engineeringprojectshub.com/serial-communication-between-nodemcu-and-arduino/)
- [MQTT Setup](https://www.baldengineer.com/mqtt-tutorial.html)

## Contributors

- [arihantb](https://github.com/arihantb): [arihantbedagkar@gmail.com](mailto:arihantbedagkar@gmail.com)
- [rohan-pednekar](https://github.com/rohan-pednekar): [developer.rohan.pednekar@gmail.com](mailto:developer.rohan.pednekar@gmail.com)

## License

This project is licensed under MIT License. See the [LICENSE](LICENSE) file for details.
